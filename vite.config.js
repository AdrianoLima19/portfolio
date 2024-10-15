import { defineConfig } from "vite";
import path from "node:path";

import loadSVG from "./src/js/plugins/svg";

export default defineConfig({
  root: "./",
  base: "./",
  publicDir: false,

  server: {
    open: "view.html",
  },

  css: {
    preprocessorOptions: {
      scss: {
        api: "modern-compiler",
        importers: [],
      },
    },
  },

  build: {
    outDir: "public",
    emptyOutDir: false,
    rollupOptions: {
      input: {
        style: "view.html",
      },
      output: {
        entryFileNames: "assets/script.js",
        chunkFileNames: "assets/js/[name].js",
        assetFileNames: ({ name }) => {
          const extname = path.extname(name);

          if (extname === ".css") return "assets/[name].[ext]";

          if (extname.match(/\.(png|jpe?g|gif|svg|webp)$/)) return "assets/images/[name].[ext]";

          if (extname.match(/\.(woff2?|eot|ttf|otf)$/i)) return "assets/fonts/[name].[ext]";

          return `assets/[name].[ext]`;
        },
      },
    },
  },
  plugins: [
    {
      name: "replace-logo-placeholder-with-svg",
      enforce: "post",
      transformIndexHtml: (html) => loadSVG(html),
    },
  ],
});
