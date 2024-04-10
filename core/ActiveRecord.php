<?php

namespace core;

/**
 * ActiveRecord pattern
 */
abstract class ActiveRecord
{
    protected int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * @return void
     */
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

    /**
     * @param array $mapProperties
     * @return void
     */
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

    /**
     * @param $mapProperties
     * @return void
     */
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

    /**
     * @return void
     */
    public function delete()
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM ' . static::getTableName() . ' WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    /**
     * @return void
     */
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

    /**
     * @return array
     */
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

    /**
     * @return array|null
     */
    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        // позднее статическое связывание
        return $db->query('SELECT * FROM ' . static::getTableName() . ';',
            [],
            static::class);
    }

    /**
     * @param $id
     * @return self|null
     */
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

    /**
     * @param $columnName
     * @param $value
     * @return self|null
     */
    public static function findOneColumn($columnName, $value): ?self
    {
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE ' . $columnName . ' = :value LIMIT 1;',
            [':value' => $value],
            static::class
        );

        if ($query == []) {
            return null;
        }

        return $query[0];
    }

    /**
     * @param string $source
     * @return string
     */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @param string $source
     * @return string
     */
    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    /**
     * @return string
     */
    abstract protected static function getTableName(): string;
}