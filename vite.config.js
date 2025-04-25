import { defineConfig } from "vite";

export default defineConfig(() => {
  return {
    base: "./",
    root: "./",
    publicDir: false,

    server: {
      open: "src/view.html",
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
      outDir: "public/assets",
      emptyOutDir: false,

      rollupOptions: {
        input: {
          script: "src/script.js",
          style: "src/style.scss",
        },

        output: {
          entryFileNames: "[name].js",
          chunkFileNames: "js/[name].js",
          assetFileNames: (assetInfo) => {
            if (/\.(gif|jpe?g|png|svg)$/.test(assetInfo.names)) return "images/[name][extname]";
            if (/\.(woff2?|ttf|eot|otf)$/.test(assetInfo.names)) return "fonts/[name][extname]";
            if (/\.(css)$/.test(assetInfo.names)) return "[name][extname]";

            return "[name][extname]";
          },
        },
      },
    },
  };
});
