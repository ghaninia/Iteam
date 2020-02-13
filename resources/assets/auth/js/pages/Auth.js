import React from  "react" ;
import ReactDOM from "react-dom" ;
import Captcha from "../components/Captcha";
import Spinner from "../components/Spinner";
import Profile from "../functions/profile" ;
import { showMessage } from "../functions/core" ;


const fields = {
    username : {
        type  : "text" ,
        label : "نام کاربری",
        rule  : "required|min:4|max:191" ,
    } ,
    password : {
        type  : "password" ,
        label : "گذرواژه" ,
        rule  : "required"
    },
    email : {
        type  : "email" ,
        label : "پست الکترونیکی" ,
        rule : "required|email"
    } ,
    name : {
        type  : "text" ,
        label : "نام" ,
        rule : "required|alpha_space"
    },
    family : {
        type  : "text" ,
        label : "نام خانوادگی" ,
        rule : "required|alpha_space"
    } ,
    remember : {
        type : "checkbox" ,
        label : "مرا به خاطر بسپار" ,
        rule : "boolean"
    },
    privacy : {
        type : "checkbox" ,
        label : "قوانین را می پذیرم" ,
        rule : "accepted"
    },
    captcha : {
        type : "captcha" ,
        label : "کد امنیتی" ,
        rule : "required|size:5|integer"
    } ,
    submit : {
        login  : "ورود به حساب کاربری" ,
        register : "حساب جدید بساز" ,
        forget : "ارسال گذرواژه به ایمیل من"
    } ,
};

export default class Auth extends React.Component{

    constructor(props){
        super(props) ;
        this.state = {
            loading : false ,
            fields : {
                username : null ,
                password : null ,
                repassword : null ,
                email : null ,
                name : null ,
                family : null ,
                remember : false ,
                role : false ,
                captcha : null ,
            }

        };

        this.validator = new SimpleReactValidator({
            element: (message, className) => <div className="text-small text-danger btn-block mt-2">{message}</div> ,
        });
        this.fieldInput = this.fieldInput.bind(this) ;
        this.setFieldInput = this.setFieldInput.bind(this) ;
        this.submitForm = this.submitForm.bind(this) ;
    }

    submitForm( event ) {

        const { action : propACTION } = this.props ;

        if ( this.state.loading ) return null ;

        /* begin works */
        if( this.validator.allValid() ){
            this.setState({ loading : true });
            axios.post( propACTION , this.state.fields ).then( response => {
                let result =  response.data ;
                if ( result.authunticate && result.msg ){

                    this.setState({ loading : false });
                    // set authunticate key
                    Profile.set( result.authunticate ) ;
                    showMessage( result.msg , function () {
                        location.reload() ;
                    });
                }
            }).catch( error => {
                if ( error.response.data.message ){
                    let message = error.response.data.message ;
                    showMessage( message , () => this.setState({ loading : false }) );
                }
            });
        } else {
            this.validator.showMessages();
            this.forceUpdate();
        }
    }

    render(){
        const { type : propTYPE , fields : propFIELDS } = this.props ;

        if ( !propFIELDS ){  return null ; }
        this.validator.purgeFields();
        return (
            <div>
                { propFIELDS.map( (field , key ) => this.fieldInput( field , key ) ) }
                <button type="button" className="btn btn-primary" onClick={this.submitForm}>
                    { this.state.loading ? <Spinner size="14" /> : fields.submit[propTYPE] }
                </button>
            </div>
        )
    }

    setFieldInput( event ){
        let obj = {} ;
        let value ;

        if ( event.target.type == "checkbox" ){
            value = event.target.checked ? true : false ;
        }else {
            value = event.target.value ;
        }

        obj [ event.target.name ] = value ;

        this.setState({
            fields : {
                ... this.state.fields ,
                ... obj ,
            }
        }) ;
    }

    fieldInput(key){
        let field = fields[key] ;
        let value = this.state['fields'][ key ]  ;

        /*
        * when type field checkbox
        */
        if ( field.type == "checkbox" ){
            return (
                <div key={key} className="custom-control custom-checkbox mb-4">
                    <input type="checkbox" className="custom-control-input" value="1" id={ key } name={ key } onChange={ this.setFieldInput } />
                    <label className="custom-control-label" htmlFor={ key }>{ field.label }</label>
                    {this.validator.message( key , value , field.rule )}
                </div>
            ) ;
        }
        /*
        * when key captcha field
        */
        if ( field.type == "captcha" ){
            return (
                <div  key={key} className="input-group form-group has-top-label mb-4">

                    <div className="input-group-prepend">
                        <div className="input-group-text">
                            <Captcha />
                        </div>
                    </div>
                    <input autoComplete="off" name={ key } className="form-control" onChange={ this.setFieldInput } />
                    <span>{ field.label }</span>
                    {this.validator.message( key , value , field.rule )}
                </div>
            );
        }
        /*
        *  when text field
        */
        return (
            <label key={key} className="form-group has-top-label mb-4">
                <input type={field.type} autoComplete="off" name={ key } className="form-control" onChange={ this.setFieldInput } />
                <span>{ field.label }</span>
                {this.validator.message( key , value , field.rule )}
            </label>
        ) ;

    }

}

if ( document.getElementById("_auth") ){
    let authForm = document.getElementById("_auth") ;
    let action = authForm.action ;
    let type = authForm.getAttribute("data-type") ;
    let fields ;

    switch( type ){
        case "login" :
            fields = ['username' , 'password' , 'captcha' , 'remember'] ;
            break ;
        case "register" :
            fields = [ 'email' , 'username' , 'password' , 'captcha' , 'privacy' ] ;
            break ;
    }

    ReactDOM.render( <Auth type={ type } action={action} fields={ fields } /> , authForm );
}
