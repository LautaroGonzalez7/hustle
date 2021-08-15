import ApiClient from "../apiClient";
import Response from "../Response";
import UserAdapter from "../../adapters/UserAdapter";
import UserTransform from "../../transformers/UserTransform";

export default class UserApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: UserAdapter = new UserAdapter();
    private transform: UserTransform = new UserTransform();

    public async getCurrent(): Promise<Response<any> | any> {
        const response = await this.client.get(`/user/current`);
        return this.adapt.getCurrentAdapt(response);
    }

    public async getCurrentRole(): Promise<Response<any> | any> {
        const response = await this.client.get(`/user/current/role`);
        return this.adapt.getCurrentAdapt(response);
    }

    public async logout(): Promise<Response<any> | any> {
        return await this.client.post('/logout', null);
    }

    public async put(user: IUser): Promise<Response<any> | any> {
        const response = await this.client.put(`/user/${user.id}`, user);
        return this.adapt.updateAdapt(response);
    }

    public async changePassword(user: IUser, currentPassword: string, newPassword: string): Promise<Response<any> | any> {
        const data = this.transform.changePasswordTransform(user, currentPassword, newPassword);
        const response = await this.client.put(`/user/password/`, data);
        return this.adapt.updateAdapt(response);
    }

}
