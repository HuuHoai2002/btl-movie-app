import { api_key, base_url } from "../config/config.js";
import { $ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";

const params = new URLSearchParams(window.location.search);

const frame = $(".play-movie-frame");
const select_episodes = $(".select-episodes");
const movie_title = $(".movie-title");

const type = params.get("type");
const id = params.get("id");
const episode = params.get("episode");

const is_movie = type === "movie";

const details_url = `${base_url}/${type}/${id}?api_key=${api_key}&language=vi`;

const renderFrame = async () => {
  const contents = `
    <iframe src=${
      is_movie
        ? `https://www.2embed.to/embed/tmdb/movie?id=${id}`
        : `https://www.2embed.to/embed/tmdb/tv?id=${id}&s=1&e=${episode}`
    } width="100%" height="100%" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
  `;
  frame.innerHTML = contents;
};

const renderMovieInfo = async () => {
  const reponse = await fetch(details_url);
  const data = await reponse.json();
  console.log(data);
  const contens = `
    <h3>Tập phim</h3>
      <div class="list-episodes">
        ${new Array(data.number_of_episodes)
          .fill(0)
          .map((_, index) => {
            return `
            <a href=${`watch.php?type=tv&id=${id}&episode=${
              index + 1
            }`} class=${
              Number(episode) === index + 1 ? "episode-active" : "episode"
            }>
              Tập ${
                data.number_of_episodes === index + 1 ? `cuối` : index + 1
              }     
            </a>
          `;
          })
          .join("")}
      </div>
  `;
  if (!is_movie) {
    select_episodes.innerHTML = contens;
    movie_title.innerText = `${data.name}: Tập ${episode}`;
  } else {
    movie_title.innerText = `${data.name || data.title}`;
  }
  setTitle(`Đang xem: ${data.name || data.title}`);
};

async function Main() {
  if (type !== "movie" && type !== "tv") {
    frame.innerHTML =
      "<h1 style='padding: 12px 0; color: var(--red); font-size: 20px'>type chỉ có thể là movie hoặc tv</h1>";
  } else {
    await renderFrame();
    await renderMovieInfo();
  }
}
Main();
