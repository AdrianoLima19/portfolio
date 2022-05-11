const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

module.exports = {
  context: path.resolve(__dirname),

  entry: {
    script: path.resolve(__dirname, "public/assets/main.js"),
  },

  output: {
    path: path.resolve(__dirname, "public/assets"),
    filename: "[name].min.js",
  },

  devtool: "source-map",

  module: {
    rules: [
      {
        test: /\.(woff|woff2|eot|ttf|svg)$/,
        exclude: /node_modules/,
        type: "asset/resource",
        generator: {
          filename: "./webfonts/[name][ext]",
        },
      },
      {
        test: /\.webp|jpg|png$/,
        exclude: /node_modules/,
        type: "asset/resource",
        generator: {
          filename: "./images/[name][ext]",
        },
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "styles.min.css",
    }),
  ],
};
