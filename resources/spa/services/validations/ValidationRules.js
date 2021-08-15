import {extend} from 'vee-validate';
import {
    required,
    email,
    digits,
    min,
    max,
    alpha,
    numeric,
    min_value,
    max_value,
    alpha_spaces,
    integer
} from 'vee-validate/dist/rules';

extend('required', {
    ...required,
    message: 'Este campo es requerido.'
});

extend('email', {
    ...email,
    message: 'Este campo debe ser un email.',
});

extend('digits', {
    ...digits,
    message: 'Este campo debe contener {length} dígitos.',
});

extend('min', {
    ...min,
    message: 'Este campo no puede contener menos de {length} dígitos.',
});

extend('max', {
    ...max,
    message: 'Este campo no puede contener más de {length} dígitos.',
});

extend('min_value', {
    ...min_value,
    message: 'No debe ser menor a {min}',
});

extend('max_value', {
    ...max_value,
    message: 'No debe ser mayor a {max}',
});

extend('alpha', {
    ...alpha,
    message: 'Este campo debe contener únicamente letras.',
});

extend('alpha_spaces', {
    ...alpha_spaces,
    message: 'Este campo debe contener únicamente letras y espacios.',
});

extend('numeric', {
    ...numeric,
    message: 'Este campo debe contener únicamente números.',
});

extend('integer', {
    ...integer,
    message: 'Este campo debe ser numérico.',
});
