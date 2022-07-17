import { api_key, base_url } from "../config/config.js";
import { $ } from "../utils/selector.js";

const params = new URLSearchParams(window.location.search);

const id = params.get("id");

const details_url = `${base_url}/movie/${id}?api_key=${api_key}&language=vi`;

async function Main() {}
Main();
