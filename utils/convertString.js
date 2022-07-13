const convertString = (str = "", option = "", upper = false) => {
  const arrayString = str.split(" ");

  switch (option) {
    case "lastname": {
      return upper
        ? arrayString[arrayString.length - 1].toUpperCase()
        : arrayString[arrayString.length - 1];
    }
    case "acronym": {
      const arrayAcronym = arrayString
        .map((word, index) => {
          if (index === arrayString.length - 1) {
            return word;
          }
          return word.charAt(0);
        })
        .join(".");

      return upper ? arrayAcronym.toUpperCase() : arrayAcronym;
    }
    default: {
      return upper ? str.toUpperCase() : str;
    }
  }
};

console.log(convertString("John Doe", "lastname", true));
console.log(convertString("John Doe", "acronym", true));
