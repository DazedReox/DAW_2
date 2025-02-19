import React from "react";
import { createRoot } from "react-dom/client";
import { DefProyecto } from "./DefProyecto";

const root = createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <DefProyecto />
  </React.StrictMode>
);
