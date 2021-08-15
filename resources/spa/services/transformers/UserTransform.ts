export default class UserTransform {

    changePasswordTransform(user: IUser, currentPassword: string, newPassword: string) {
        return JSON.stringify({
            user_id: user.id,
            password_reset: {
                current_password: currentPassword,
                new_password: newPassword,
                new_password_confirmation: newPassword
            }
        });
    }

}
