import{u as g,r as x,j as s,a as e,H as b,L as w}from"./app.021ffa7e.js";import{C as N}from"./Checkbox.777736bc.js";import{G as v}from"./GuestLayout.d703ebc0.js";import{T as l,I as n}from"./TextInput.52c72076.js";import{I as i}from"./InputLabel.6d946017.js";import{P as y}from"./PrimaryButton.00d0aee2.js";import"./ApplicationLogo.85c0535c.js";function H({status:m,canResetPassword:c}){const{data:r,setData:d,post:u,processing:p,errors:o,reset:h}=g({email:"",password:"",remember:""});x.exports.useEffect(()=>()=>{h("password")},[]);const t=a=>{d(a.target.name,a.target.type==="checkbox"?a.target.checked:a.target.value)};return s(v,{children:[e(b,{title:"Admin Log in"}),m&&e("div",{className:"mb-4 font-medium text-sm text-green-600",children:m}),s("form",{onSubmit:async a=>{a.preventDefault();let f=await u(route("admin.login"));console.log(f)},children:[s("div",{children:[e(i,{forInput:"email",value:"Email"}),e(l,{type:"text",name:"email",value:r.email,className:"mt-1 block w-full",autoComplete:"username",isFocused:!0,handleChange:t}),e(n,{message:o.email,className:"mt-2"})]}),s("div",{className:"mt-4",children:[e(i,{forInput:"password",value:"Password"}),e(l,{type:"password",name:"password",value:r.password,className:"mt-1 block w-full",autoComplete:"current-password",handleChange:t}),e(n,{message:o.password,className:"mt-2"})]}),e("div",{className:"block mt-4",children:s("label",{className:"flex items-center",children:[e(N,{name:"remember",value:r.remember,handleChange:t}),e("span",{className:"ml-2 text-sm text-gray-600",children:"Remember me"})]})}),s("div",{className:"flex items-center justify-end mt-4",children:[c&&e(w,{href:route("password.request"),className:"underline text-sm text-gray-600 hover:text-gray-900",children:"Forgot your password?"}),e(y,{className:"ml-4",processing:p,children:"Admin Log in"})]})]})]})}export{H as default};
