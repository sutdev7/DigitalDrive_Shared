import Config from '../../config/network';

class ApiLibrary {
    constructor() {

    }
    getApi(queryString,token="",roleId="") {
        if(token){
            headerObj= { 
                'Authorization' : `Bearer ${token}`,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'accessRole' : roleId
            }
        }else{
            headerObj= { 
                "Content-Type": "application/json",
                'accessRole' : roleId
            }
        }
        
        return new Promise((resolve, reject) => {
            url = Config.ROOT_URL + queryString;
            //console.log(url);
            return fetch(url, {
                method: 'GET',
                headers:headerObj,
                
            })
            .then((response) => response.json())
            .then((responseJson) => {
                resolve(responseJson);
            })
            .catch((error) => {
                reject(error);
            });
        })
    }

    customGetApi(customURL) {
        //console.log('library',customURL)
        return new Promise((resolve, reject) => {
            return fetch(customURL, {
                method: 'GET',
                // headers:{
                //     "Content-Type": "application/json"
                // },
            })
            .then((response) => response.json())
            .then((responseJson) => {
                //console.log('---->',responseJson)
                resolve(responseJson);
            })
            .catch((error) => {
                //console.log('catch>',error)
                reject(error);
            });
        })
    }

    postApi(posturl,postData,token=""){
        if(token){
            headerObj= { 
                'Authorization' : `Bearer ${token}`,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            }
        }else{
            headerObj= { 
                "Content-Type": "application/json"
            }
        }
        return new Promise((resolve, reject) => {
            url = Config.ROOT_URL + posturl;
            return fetch(url, {
                method: 'POST',
                headers:headerObj,
                body: JSON.stringify(postData),
            })
            .then((response) => response.json())
            .then((responseJson) => {
                resolve(responseJson);
            })
            .catch((error) => {
                reject(error);
            });
        })
    }
}
export default new ApiLibrary();