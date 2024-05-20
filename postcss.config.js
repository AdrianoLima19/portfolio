import autoprefixer from "autoprefixer";
import purgecss from "@fullhuman/postcss-purgecss";

const plugins = [autoprefixer()];

if (process.env.NODE_ENV === "production") {
  plugins.push(
    purgecss({
      content: ["./**/*.html"],
    })
  );
}

export default {
  plugins,
};
