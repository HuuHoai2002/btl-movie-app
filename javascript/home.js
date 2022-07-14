import { api_key, base_url, data_type } from "../config/config.js";
import { renderListMovie } from "../utils/render.js";
import { $ } from "../utils/selector.js";

const movie_popular = $(".movie-list.popular");
const movie_toprated = $(".movie-list.top-rated");
const movie_upcoming = $(".movie-list.up-coming");

console.log(movie_popular, movie_toprated, movie_upcoming);

const popular_url = `${base_url}/movie/${data_type.POPULAR}?api_key=${api_key}&language=vi&page=1`;
const toprated_url = `${base_url}/movie/${data_type.TOP_RATED}?api_key=${api_key}&language=vi&page=1`;
const upcoming_url = `${base_url}/movie/${data_type.UP_COMING}?api_key=${api_key}&language=vi&page=1`;

const Main = async () => {
  await renderListMovie(popular_url, movie_popular);
  await renderListMovie(toprated_url, movie_toprated);
  await renderListMovie(upcoming_url, movie_upcoming);
};

Main();
