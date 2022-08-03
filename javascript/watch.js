import { api_key, base_url } from "../config/config.js";
import { params } from "../utils/getParams.js";
import {
  renderListMovie,
  renderMovieRecommendations,
} from "../utils/render.js";
import { $ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";

const frame = $(".play-movie-frame");
const sidebar = $(".play-sidebar");
const movie_recommendations = $(".movie-list");

//get parameters from url
const type = params.get("type");
const id = params.get("id");
const episode = params.get("episode");

const is_movie = type === "movie";

//api url
const details_url = `${base_url}/${type}/${id}?api_key=${api_key}&language=vi`;
const similar_url = `${base_url}/${type}/${id}/similar?api_key=${api_key}&language=vi`;
const recommendations_url = `${base_url}/${type}/${id}/recommendations?api_key=${api_key}&language=vi`;

const renderFrame = async () => {
  const contents = `
    <iframe src=${
      is_movie
        ? `https://www.2embed.to/embed/tmdb/movie?id=${id}`
        : `https://www.2embed.to/embed/tmdb/tv?id=${id}&s=1&e=${episode}`
    } width="100%" height="100%" allowfullscreen="allowfullscreen" frameborder="0">
    </iframe>
  `;
  frame.innerHTML = contents;
};

const renderSidebar = async () => {
  const reponse = await fetch(details_url);
  const data = await reponse.json();
  const contents = `
    <div class="movie-watching-info">
      <h3 class="watching-title">${data.name || data.title}</h3>
      ${!is_movie ? `<div class="watching-episode">Tập ${episode}</div>` : ""}
    </div>
    ${
      !is_movie
        ? `<div class="list-episodes" style=${
            is_movie ? "max-height:480px" : "max-height:443px"
          }>
      ${new Array(data.number_of_episodes)
        .fill(0)
        .map((_, index) => {
          return `
              <a href=${`watch.php?type=tv&id=${id}&episode=${
                index + 1
              }`} class=${
            Number(episode) === index + 1 ? "episode-active" : "episode"
          }>
                ${
                  data.number_of_episodes === index + 1 ? `End` : index + 1
                }     
            </a>
          `;
        })
        .join("")}
    </div>`
        : `<div class="recommendations" style=${
            is_movie ? "max-height:480px" : "max-height:443px"
          }>
            <span style="font-size: 14px; font-weight: 500; color: var(--blue); width: 100%">Phim liên quan</span>
            ${await renderMovieRecommendations(similar_url)}
          </div>`
    }
  `;
  sidebar.innerHTML = contents;
  setTitle(`Đang xem: ${data.name || data.title}`);
};

async function Main() {
  if (type !== "movie" && type !== "tv") {
    frame.innerHTML =
      "<h1 style='padding: 12px 0; color: var(--red); font-size: 20px'>type chỉ có thể là movie hoặc tv</h1>";
  } else {
    await renderFrame();
    await renderSidebar();
    await renderListMovie(recommendations_url, movie_recommendations);
  }
}
Main();
