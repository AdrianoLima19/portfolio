import path from "node:path";
import fs from "fs";

export default function loadSVG(html) {
  const svg = path.resolve(__dirname, "../../../public/assets/images/logo.svg");
  const content = fs.readFileSync(svg, "utf8");

  return html.replace(/{{\s*logo\s*}}/g, content);
}
