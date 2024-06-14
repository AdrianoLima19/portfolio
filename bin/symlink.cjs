const fs = require("fs-extra");
const path = require("path");

const target = path.join(__dirname, "../public/assets");
const link = path.join(__dirname, "../src/assets");

fs.pathExists(link)
  .then((exists) => {
    if (exists) {
      return fs.lstat(link);
    } else {
      return Promise.reject(new Error("Link does not exist"));
    }
  })
  .then((stats) => {
    if (stats.isSymbolicLink()) {
      return fs.readlink(link);
    } else {
      return Promise.reject(new Error("Not a symbolic link"));
    }
  })
  .then((linkTarget) => {
    if (linkTarget === target) {
      console.log("Symbolic link already exists and is correct.");
    } else {
      return Promise.reject(new Error("Symbolic link points to the wrong location"));
    }
  })
  .catch((err) => {
    console.log("Creating symbolic link:", err.message);
    fs.ensureDir(path.dirname(link))
      .then(() => fs.symlink(target, link))
      .then(() => console.log("Symbolic link created successfully!"))
      .catch((err) => console.error("Error creating symbolic link:", err));
  });
