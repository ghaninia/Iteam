import React from "react" ;
import ReactDOM from "react-dom" ;
import Spinner from "../../components/Spinner";

const allowImageExtension = [
    'image/jpeg', 'image/jpg', 'image/png'
];

export default class ProfileAccount extends React.Component{

    constructor(props) {
        super(props);
        this.state = {
            user : {} ,
            step : 0 ,
            wizard : null
        };
        this.next = this.next.bind(this) ;
        this.prev = this.next.bind(this) ;
        this.validator = new SimpleReactValidator({
            element: (message, className) => <div className="text-small text-danger btn-block mt-2">{message}</div> ,
        });
        this.setFieldInput = this.setFieldInput.bind(this) ;
        this.setCover = this.setCover.bind(this) ;
        this.setPic = this.setPic.bind(this) ;
    }

    componentDidMount() {
        axios.post( options.ajax , {
            action : "profile-account"
        }).then( response => {
            let user = response.data ;
            this.setState({
                user ,
                wizard : [
                    {
                        name : "مشخصات شخصی" ,
                        component : this._renderPersonal( user )
                    } , {
                        name : "مشخصات تماس" ,
                        component : this._renderContact( user )
                    } , {
                        name : "شبکه های اجتماعی" ,
                        component : null
                    } , {
                        name : "محل سکونت" ,
                        component : null ,
                    }
                ][this.state.step]
            }) ;
        }) ;
    }

    render() {
        const { wizard } = this.state ;

        if( wizard == null ){
            return (
                <Spinner/>
            );
        }

        return (
            <div>
                <h6>{ wizard.name }</h6>
                { wizard.component }
                <button onClick={ this.next } className="btn btn-primary mt-3 pl-5 pr-5 float-left"> مرحله بعدی </button>
            </div>
        );
    }

    setFieldInput( event ){
        let obj = {} ;
        obj[ event.target.name ] = event.target.value ;
        this.setState({
            user : {
                ...this.state.user ,
                ...obj
            }
        });
    }

    next(event) {
        event.preventDefault() ;
        const { step } = this.state ;
        if (this.validator.allValid()) {
            if ( 4 > step ){
                this.setState({
                    step : step + 1
                })
            }
        }else {
            this.validator.showMessages() ;
            this.forceUpdate() ;
        }
    }

    prev( event  ){

    }

    setCover(){
        let coverINPUT = document.querySelector("#profile__cover input[name=cover]") ;
        let cover = document.getElementById("profile__cover") ;
        coverINPUT.click() ;
        coverINPUT.addEventListener("change" , (response) => {
            if( response.target.files.length ){
                let reader = new FileReader();
                let file = response.target.files[0] ;
                if( !allowImageExtension.includes(file.type) ){
                    Snackbar.show({
                        text : "فرمت تصویر ارسالی معتبر نمیباشد !" ,
                        showAction: false
                    });
                    coverINPUT.value = "" ;
                    return false ;
                }
                reader.onload = (e) => {
                    cover.style.backgroundImage = `url(${e.target.result})` ;
                };
                reader.readAsDataURL(file) ;
            }
        })
    }

    setPic(){
        let picINPUT = document.querySelector("#profile__cover input[name=picture]") ;
        let pic = document.getElementById("profile__pic") ;
        picINPUT.click() ;
        picINPUT.addEventListener("change" , (response) => {
            if( response.target.files.length ){
                let reader = new FileReader();
                let file = response.target.files[0] ;
                reader.onload = (e) => {
                    pic.src = e.target.result ;
                };
                reader.readAsDataURL(file) ;
            }
        })
    }

    _renderPersonal( user ){
        const style = {
            backgroundImage : ( user.cover != null ) ? `url(${user.cover})` : null
        };
        return (
            <div>
                <div className="cover" id="profile__cover" style={ style }>

                    <input accept="image/*" type="file" name="cover" className="hidden"/>

                    <input accept="image/*" type="file" name="picture" className="hidden"/>

                    <img alt={ user.username } id="profile__pic" src={ user.avatar } className="img-thumbnail border-0 mb-4 list-thumbnail"/>

                    <div onClick={ this.setPic } id="profile__change-pic" className="profile__change-pic">
                        <i className="glyph-icon simple-icon-camera"></i>
                    </div>

                    <div onClick={ this.setCover } id="profile__change-cover" className="profile__change-cover">
                        <i className="glyph-icon simple-icon-camera"></i>
                    </div>

                </div>
                <label className="form-group has-top-label">
                    <input name="name" className="form-control" value={user.name} autoComplete="off" onChange={ this.setFieldInput }/>
                    <span>نام</span>
                </label>
                <label className="form-group has-top-label">
                    <input name="family" className="form-control" value={user.family} autoComplete="off" onChange={ this.setFieldInput }/>
                    <span>نام خانوادگی</span>
                </label>
                <label className="form-group has-top-label">
                    <input name="username" className="form-control" value={user.username} autoComplete="off"  onChange={ this.setFieldInput }/>
                    <span>نام کاربری</span>
                </label>
            </div>
        );
    }

    _renderContact( user ){
        return null;
        // return (
        //     <div>
        //         <label className="form-group has-top-label">
        //             <input name="email" className="form-control" value={ user.email } onChange={ this.setFieldInput }/>
        //             <span>پست الکترونیکی</span>
        //             {this.validator.message( 'email' , this.state.user.email ,"required|email"  )}
        //         </label>
        //         <label className="form-group has-top-label">
        //             <input name="mobile" className="form-control" value={ user.mobile } onChange={ this.setFieldInput }/>
        //             <span>موبایل</span>
        //         </label>
        //         <label className="form-group has-top-label">
        //             <input name="website" className="form-control" value={ user.website } onChange={ this.setFieldInput }/>
        //             {this.validator.message( 'website' , this.state.user.website ,"url"  )}
        //             <span>وب سایت</span>
        //         </label>
        //         <label className="form-group has-top-label">
        //             <input name="phone" className="form-control" value={ user.phone } onChange={ this.setFieldInput }/>
        //             <span>تلفن</span>
        //         </label>
        //         <label className="form-group has-top-label">
        //             <input name="fax" className="form-control" value={ user.fax } onChange={ this.setFieldInput }/>
        //             <span>فکس</span>
        //         </label>
        //     </div>
        // );
    }

}

if ( document.getElementById("_profile-account") ){
    var element = document.getElementById("_profile-account") ;
    var action = element.action ;
    ReactDOM.render( <ProfileAccount action={ action }/> , element );
}