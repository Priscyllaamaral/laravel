import axios from 'axios';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.log('CSRF token not found!');
}

// axios.defaults.baseURL = config.API_ENDPOINT;
axios.defaults.headers.common['Authorization'] = token.content;
axios.defaults.headers.get['Content-Type'] = 'application/json';
axios.defaults.headers.post['Content-Type'] = 'application/json';
