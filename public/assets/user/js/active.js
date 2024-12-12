async function active(_propertyId) {
    data = {
        property_id: _propertyId
    }
    try {
        const response = await sendRequest(`${window.location.origin}/user/posts/toggle-active`, 'POST', data);
        if (response.status == 200) {
            toast(response.message);
        }
    } catch (error) {
        console.log(error);
        toast('Something went wrong. Please try again.');
    }
}