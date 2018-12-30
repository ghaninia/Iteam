import { localHasItem , localSetItem , localRemoveItem , localGetItem } from "./core" ;

const profile__key = "_auth" ;

export default class Profile {

    static set ( code ){
        return localSetItem( profile__key , code ) ;
    }

    static check () {
        return localHasItem( profile__key );
    }

    static remove () {
        return localRemoveItem( profile__key ) ;
    }

    static get (){
        return localGetItem( profile__key ) ;
    }
}