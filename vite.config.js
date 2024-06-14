import { defineConfig } from "vite";
import path from "node:path";

export default () => {
  return defineConfig({
    root: path.resolve(__dirname, "src"),
    base: "./",

    server: {
      open: "view.html",
      port: 3000,
    },

    build: {
      outDir: "../public",
      emptyOutDir: false,
      manifest: true,
      cssCodeSplit: false,

      rollupOptions: {
        input: {
          style: path.resolve(__dirname, "src/view.html"),
        },
        output: {
          entryFileNames: "script.js",
          chunkFileNames: "js/[name].js",
          assetFileNames: ({ name }) => {
            const extname = path.extname(name);

            if (extname === ".css") return "[name].[ext]";

            if (extname.match(/\.(png|jpe?g|gif|svg|webp)$/)) return "assets/images/[name].[ext]";

            if (ext.match(/\.(woff2?|eot|ttf|otf)$/i)) return "assets/fonts/[name].[ext]";

            return `assets/[name].[ext]`;
          },
        },
      },
    },
  });
};
