import { api_key, base_url } from "../config/config.js";

const params = new URLSearchParams(window.location.search);

const type = params.get("type");
const id = params.get("id");
const episode = params.get("episode");

const details_url = `${base_url}/${type}/${id}?api_key=${api_key}&language=vi`;

async function Main() {}
Main();
