import {isError} from "../../utils/helpers/isError";
import {ActionNames} from "../../utils/constants/ActionNames";

export default class UserAdapter {

    getCurrentAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.userGetSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.userGetFailed,
            error: true
        }
    }

    getCurrentRoleAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.userRoleGetSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.userRoleGetFailed,
            error: true
        }
    }

    updateAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.userUpdateSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.userUpdateFailed,
            error: true
        }
    }
}
