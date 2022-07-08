import ApiClient from "../apiClient";
import Response from "../Response";
import OrderAdapter from "../../adapters/OrderAdapter";

export default class OrderApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: OrderAdapter = new OrderAdapter();

    public async update(order: any): Promise<Response<any> | any> {
        const response = await this.client.put(`/order/${order.id}`, order);
        return this.adapt.updateAdapt(response);
    }

    public async getAll(): Promise<Response<any> | any> {
        const response = await this.client.get(`/order`);
        return this.adapt.getAllAdapt(response);
    }
}
