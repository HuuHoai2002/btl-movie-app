import { image_reduce, image_url } from "../config/config.js";
import { setTitle } from "../utils/setTitle.js";
import { fetchData } from "./fetchData.js";

export const renderAppBanner = async (url, root) => {
  const data = await fetchData(url);
  const contents = data
    ?.map((content) => {
      return `
                <div class="app-banner-wrapper">
                  <div class="overlay"></div>
                  <div class="app-banner-image">
                    <img
                      src=${image_url + content.backdrop_path}
                      alt="preview-movie"
                    />
                  </div>
                  <div class="app-banner-content">
                    <div class="content-wrapper">
                      <h2 class="content-name">${
                        content.name || content.title
                      }</h2>
                      <p class="content-info">
                        ${content.overview || "Chưa có mô tả chi tiết"}
                      </p>
                      <div class="content-actions">
                        <a href=${
                          `watch.php?id=` + content.id
                        } class="base-btn bg-primary"
                          ><svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M5 3v18a1 1 0 0 0 1.54.841l14-9a1 1 0 0 0 0-1.682l-14-9A1 1 0 0 0 5 3zm2 1.832L18.15 12 7 19.167V4.832z"
                              fill="#FFF"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                          Xem phim
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            `;
    })
    .join("");

  root.innerHTML = contents;
};
export const renderListMovie = async (url, root) => {
  const data = await fetchData(url);

  let contents =
    "<h1 style='font-weigth: 500; font-size: 20px; color: var(--red)'>Không tìm thấy bộ phim nào</h1>";

  if (data.length > 0) {
    contents = data
      ?.map((content) => {
        return `
          <a href=${`details.php?type=${content.name ? "tv" : "movie"}&id=${
            content.id
          }`} class="movie-item">
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
  }

  root.innerHTML = contents;
};

export const renderMovieDetails = async (url, root) => {
  const response = await fetch(url);
  const data = await response.json();
  const contents = `
      <div class="movie-details-content">
        <div class="movie-details-image">
          <img src=${image_url + data.backdrop_path} alt="preview-movie-detals">
        </div>
        <div class="movie-info">
          <h2 class="movie-title">${
            data.title || data.name || data.original_title
          }</h2>
          <div class="genres-list">
            ${data.genres
              ?.slice(0, 3)
              .map((genre) => {
                return `<span class="genres-item">${genre.name}</span>`;
              })
              .join("")}
          </div>
          <div class="list-content">
            <p class="movie-overview">
              ${data.overview || "Bộ phim chưa có mô tả chi tiết"}
            </p>
            <div class="content">
              <span class="content-title">${
                data.name ? "Ngày phát sóng:" : "Ngày ra rạp:"
              }</span>
              <span class="content-info">${
                data.release_date || data.first_air_date
              }</span>
            </div>
            <div class="content">
              <span class="content-title">${
                data.name ? "Tổng số tập phim:" : "Thời lượng:"
              }</span>
              <span class="content-info">${
                data.name ? data.number_of_episodes : data.runtime
              } ${data.name ? "tập" : "phút"}</span>
            </div>
            <div class="content">
              <span class="content-title">Đánh giá:</span>
              <span class="content-info">${data.vote_average}</span>
            </div>
          </div>
          <div class="actions">
            <a href=${`watch.php?type=${data.name ? "tv" : "movie"}&id=${
              data.id
            }${data.name ? "&episode=1" : ""}`} class="base-btn bg-primary">
              <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3v18a1 1 0 0 0 1.54.841l14-9a1 1 0 0 0 0-1.682l-14-9A1 1 0 0 0 5 3zm2 1.832L18.15 12 7 19.167V4.832z" fill="#FFF" fill-rule="evenodd"></path>
              </svg>
              Xem phim
            </a>
          </div>
        </div>
      </div>
    `;
  setTitle(data.title || data.name || data.original_title);
  root.innerHTML = contents;
};
