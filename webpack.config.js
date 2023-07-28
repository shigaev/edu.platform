const path = require('path');
const HTMLWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

const isDev = process.env.NODE_ENV === 'development';
const isProd = !isDev;

module.exports = {
    resolve: {
        extensions: ['.css', '.scss', '.sass', '.js', '.jpg', '.png', '.svg', '.ico', '.json'],
    },
    mode: 'development',
    entry: {
        index: path.resolve(__dirname, 'src/index.js')
    },
    devServer: {
        allowedHosts: [
            'edu.platform',
        ],
        host: 'localhost',
        port: 9092,
        hot: false,
        proxy: {
            'http://edu.platform/': {
                target: `http://localhost/edu.platform/frontend/public/`,
                pathRewrite: {'^/edu.platform/frontend/public/': ''},
            }
        },
        watchFiles: ['**/*.php', 'src/**/*.css', 'src/**/*.scss'],
        devMiddleware: {
            publicPath: path.resolve(__dirname, 'public'),
            writeToDisk: true,
        }
    },
    output: {
        // filename: './js/[name].[contenthash].js',
        filename: './js/[name].js',
        path: path.resolve(__dirname, 'frontend/public'),
        clean: false
    },
    devtool: 'inline-source-map',
    optimization: {
        runtimeChunk: 'single',
        minimizer: [
            new CssMinimizerPlugin(),
            new TerserPlugin()
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: './css/[name].css'
        })
    ],
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    'css-loader'
                ],
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    {
                        loader: "sass-loader",
                    },
                ],
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[name][ext]'
                },
            },
            {
                test: /\.(ico)$/i,
                type: 'asset/resource',
                generator: {
                    filename: '[name][ext]'
                },
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext]'
                },
            },
            {
                test: /\.(csv|tsv)$/i,
                use: ['csv-loader'],
            },
            {
                test: /\.xml$/i,
                use: ['xml-loader'],
            },
            {
                test: /\.xlsx$/,
                use: "webpack-xlsx-loader"
            },
            {
                test: /\.m?js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
            /*{
                test: /\.pug$/i,
                use: [
                    {
                        loader: 'html-loader',
                        options: {
                            minimize: isProd
                        }
                    },
                    {
                        loader: 'pug-html-loader',
                        options: {
                            pretty: true
                        }
                    }
                ],
            }*/
        ],
    },
};