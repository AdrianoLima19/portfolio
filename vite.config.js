import { defineConfig } from "vite";
import path from "node:path";

export default defineConfig({
  publicDir: false,
  base: "./",
  root: "./src",

  server: {
    open: "view.html",
    port: 3000,
  },

  build: {
    outDir: "../public",
    emptyOutDir: false,
    rollupOptions: {
      input: {
        style: "./src/view.html",
      },
      output: {
        entryFileNames: "assets/script.js",
        chunkFileNames: "assets/js/[name].js",
        assetFileNames: ({ name }) => {
          const extname = path.extname(name);

          if (extname === ".css") return "assets/[name].[ext]";

          if (extname.match(/\.(png|jpe?g|gif|svg|webp)$/))
            return "assets/images/[name].[ext]";

          if (ext.match(/\.(woff2?|eot|ttf|otf)$/i))
            return "assets/fonts/[name].[ext]";

          return `assets/[name].[ext]`;
        },
      },
    },
  },
});
