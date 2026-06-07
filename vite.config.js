import { defineConfig, loadEnv } from "vite";

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), "");

  return {
    publicDir: false,

    build: {
      manifest: true,
      outDir: "public/build",
      rollupOptions: {
        input: {
          script: "resources/js/script.js",
          style: "resources/scss/style.scss",
        },
      },
    },

    plugins: [
      {
        name: "php-hot-reload",

        configureServer(server) {
          server.watcher.add("resources/**/*.php");

          server.watcher.on("change", (file) => {
            if (file.endsWith(".php")) {
              server.ws.send({
                type: "full-reload",
                path: "*",
              });
            }
          });
        },
      },
    ],

    server: {
      port: env.VITE_PORT,
      strictPort: true,
      cors: true,
      origin: env.VITE_URL,

      hmr: {
        host: env.VITE_HOST,
        protocol: "ws",
        port: env.VITE_PORT,
      },
    },
  };
});
