var options = {
  shouldSort: true,
  includeScore: true,
  threshold: 0.6,
  location: 0,
  distance: 9,
  maxPatternLength: 32,
  minMatchCharLength: 3,
  keys: [
    "a"
]
};
var fuse = new Fuse(list, options); // "list" is the item array
var result = fuse.search("sagan");