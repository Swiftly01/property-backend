
const form = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('status');

console.log(true);

let debounceTimer = '';

searchInput.addEventListener('input', () =>  {
  clearTimeout(debounceTimer);

  debounceTimer = setTimeout(() => {
    form.submit();
  }, 400);

});


statusFilter.addEventListener('change', () => {
  form.submit();
})



