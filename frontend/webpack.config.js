const path = require('path');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const webpack = require('webpack');
const Xervice = require('xervice-gui');
const XerviceSettings = require('xervice-gui/lib/settings');

application_path = path.join(__dirname, '..');

XerviceSettings.scss.setPaths(
    [
        path.join(application_path, 'src', 'App'),
        path.join(application_path, 'vendor', 'xervice', '*', 'src', 'Xervice'),
    ]
);

xerviceFiles = [];
xerviceFiles = xerviceFiles.concat(Xervice(XerviceSettings).getFilesWithType('*.scss'));
xerviceFiles = xerviceFiles.concat(Xervice(XerviceSettings).getFilesWithType('*.js'));
xerviceFiles = xerviceFiles.concat(Xervice(XerviceSettings).getFilesWithType('*.jsx'));

module.exports = {
    entry: () => new Promise((resolve => resolve(xerviceFiles))),
    output: {
        filename: 'js/app.js',
        path: path.resolve(__dirname, '..', 'public')
    },
    node: {
        fs: 'empty'
    },
    resolve: {
        alias: {
            app: path.resolve(__dirname, 'react', 'components')
        },
        extensions: [
            '*',
            '.js',
            '.jsx'
        ]
    },
    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            },
            {
                test: /.jsx?$/,
                loader: 'babel-loader',
                exclude: /node_modules/
            },
            {
                test: /\.(css)$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: 'css-loader'
                    }
                ]
            },
            {
                test: /\.(less)$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'less-loader'
                    }
                ]
            },
            {
                test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: '/css/fonts/'
                    }
                }]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "css/[name].css",
            chunkFilename: "css/[id].css"
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        })
    ]
};