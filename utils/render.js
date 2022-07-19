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
                      src=${
                        content.backdrop_path
                          ? image_url + content.backdrop_path
                          : "https://cdn.dribbble.com/userupload/2905354/file/original-92212c04a044acd88c69bedc56b3dda2.png?compress=1&resize=1024x768"
                      }
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
                          `watch.php?type=movie&id=` + content.id
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
                <img src=${
                  content.poster_path
                    ? image_reduce + content.poster_path
                    : "https://cdn.dribbble.com/userupload/2905354/file/original-92212c04a044acd88c69bedc56b3dda2.png?compress=1&resize=1024x768"
                } alt="" />
              </div>
              <div class="movie-content">
                <p class="movie-content-info">${
                  content.name || content.title
                }</p>
              </div>
              ${content.name ? `<div class="tv-icon">TV</div>` : ""}
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
          <img src=${
            data.backdrop_path
              ? image_url + data.backdrop_path
              : "https://cdn.dribbble.com/userupload/2905354/file/original-92212c04a044acd88c69bedc56b3dda2.png?compress=1&resize=1024x768"
          } alt="preview-movie-detals">
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

export const renderMovieRecommendations = async (url) => {
  const data = await fetchData(url);
  const contents = data
    ?.map((item) => {
      return `
      <div class="movie-recommendations">
        <div class="movie-recommendations-item">
          <img src=${
            item.poster_path
              ? image_reduce + item.poster_path
              : "https://cdn.dribbble.com/userupload/2905354/file/original-92212c04a044acd88c69bedc56b3dda2.png?compress=1&resize=1024x768"
          } alt="movie">
        <div class="movie-recommendations-info">
          <span class="title">${item.title || item.name}</span>
        <div class="vote">8.8
          <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 20 20" fill="#CAAE02">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </div>
          <div style="margin-top: auto">
            <a href=${`watch.php?type=${item.name ? "tv" : "movie"}&id=${
              item.id
            }${item.name ? "&episode=1" : ""}`} class="button">Xem ngay</a>
          </div>
        </div>
      </div>
    </div>
    `;
    })
    .join("");
  return contents;
};
