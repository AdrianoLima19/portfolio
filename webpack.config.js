const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const path = require("path");

module.exports = {
  //   mode: "production",

  context: path.resolve(__dirname),

  entry: {
    script: path.resolve(__dirname, "assets/js/main.js"),
  },
  output: {
    path: path.resolve(__dirname),
    filename: "public_html/[name].js",
  },

  devtool: "source-map",

  module: {
    rules: [
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        include: path.resolve(__dirname, "assets/js"),
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.(s[ac]|c)ss$/i,
        exclude: /node_modules/,
        include: path.resolve(__dirname, "assets/css"),
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader", "sass-loader"],
      },
      {
        test: /\.(woff|woff2|eot|ttf|svg)$/,
        exclude: /node_modules/,
        type: "asset/resource",
        generator: {
          filename: "[path][name][ext]",
        },
      },
      {
        test: /\.webp|jpg|png$/,
        exclude: /node_modules/,
        type: "asset/resource",
        generator: {
          filename: "[path][name][ext]",
        },
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "public_html/style.css",
    }),
  ],
};
