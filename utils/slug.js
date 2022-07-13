const slug = (str) => {
  const slug = str.toLowerCase();
  return slug.replace(/[^a-z0-9]+/g, "-");
};

