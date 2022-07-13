export const render = (data, root) => {
  const contents = data
    .map((item) => {
      return ``;
    })
    .join("");

  root.innerHTML = contents;
};
