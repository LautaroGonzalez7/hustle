/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios"

// @ts-ignore
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token: HTMLMetaElement | null = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    // @ts-ignore
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (401 === error.response.status) {
        window.location.href="/login";
    } else {
        return Promise.reject(error);
    }
});
