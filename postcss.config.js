const purgecss = require("@fullhuman/postcss-purgecss");

module.exports = {
  syntax: "postcss-scss",
  plugins: [
    require("postcss-preset-env"),
    purgecss({
      content: ["./**/*.html"],
      safelist: ["open", "close", "closing", "spin", "spinner", "lock"],
    }),
  ],
};
