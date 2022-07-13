import { api_key, base_url, image_url } from "../config/config.js";
import { fetchData } from "../utils/fetchData.js";

const appBanner = document.querySelector(".app-banner");

const url = `${base_url}/movie/popular?api_key=${api_key}&language=vi&page=1`;

const renderAppBanner = async () => {
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

  appBanner.innerHTML = contents;
};

async function Main() {
  await renderAppBanner();
  $(document).ready(function () {
    $(".app-banner").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      fade: true,
      arrows: false,
      cssEase: "linear",
    });
  });
}
Main();
