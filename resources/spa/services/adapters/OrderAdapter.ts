import {isError} from "../../utils/helpers/isError";
import {ActionNames} from "../../utils/constants/ActionNames";

export default class OrderAdapter {
    updateAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data,
                type: ActionNames.searchCreateSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchCreateFailed,
            error: true
        }
    }

    getAllAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.searchGetSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchGetFailed,
            error: true
        }
    }
}
