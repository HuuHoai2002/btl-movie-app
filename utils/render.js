import { image_reduce } from "../config/config.js";
import { fetchData } from "./fetchData.js";

export const renderListMovie = async (url, root) => {
  const data = await fetchData(url);
  const contents = data
    ?.map((content) => {
      return `
          <a href=${`details.php?name=${
            encodeURI(content?.name) || encodeURI(content?.title)
          }&id=${content.id}`} class="movie-item">
              <div class="movie-image">
                <img src=${image_reduce + content.poster_path} alt="" />
              </div>
              <div class="movie-content">
                <p class="movie-content-info">${
                  content.name || content.title
                }</p>
              </div>
            </a>
        `;
    })
    .join("");
  root.innerHTML = contents;
};
