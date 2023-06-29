<?php

namespace core;

/**
 * ActiveRecord pattern
 */
abstract class ActiveRecord
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public function save(): void
    {
        $mapProperties = $this->reflectionProperties();
        if ($this->id != null) {
            $this->update($mapProperties);
        } else {
            $this->insert($mapProperties);
        }
    }

    // UPDATE
    public function update(array $mapProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;

        foreach ($mapProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $params2values[$param] = $value;
            $index++;
        }

        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    // INSERT
    public function insert($mapProperties)
    {
        $filterProperties = array_filter($mapProperties);

        $columns = [];
        $paramNames = [];
        $params2values = [];
        foreach ($filterProperties as $columnName => $value) {
            $columns[] = '`' . $columnName . '`';
            $paramName = ':' . $columnName;
            $paramNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(',', $columns);
        $paramsNamesViaSemicolon = implode(',', $paramNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsert();
        $this->refresh();
    }

    // DELETE
    public function delete()
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    private function refresh(): void
    {
        $objectFromDb = static::findOne($this->id);
        $reflector = new \ReflectionObject($objectFromDb);
        $properties = $reflector->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $this->$propertyName = $property->getValue($objectFromDb);
        }
    }

    private function reflectionProperties(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mapProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mapProperties[$propertyNameUnderscore] = $this->$propertyName;
        }

        return $mapProperties;
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        // позднее статическое связывание
        return $db->query('SELECT * FROM ' . static::getTableName() . ';',
            [],
            static::class);
    }

    public static function findOne($id): ?self
    {
        $db = Db::getInstance();
        // позднее статическое связывание
        $entity = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE id = :id',
            [':id' => $id],
            static::class
        );
        return $entity ? $entity[0] : null;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    abstract protected static function getTableName(): string;
}