
 fetch("https://temikeezy.github.io/nigeria-geojson-data/data/full.json")
  .then(res => res.json())
  .then(data => {
    console.log(data);
  });