import{_ as f,f as d,b as r,a as s,g as u,r as i,o as c}from"./app.360d8a91.js";const g={props:{formData:Object,products:Object,statuses:Object},computed:{productPackages(){var l,a;return(a=(l=this.products.find(e=>e.id===this.formData.product_id))==null?void 0:l.packages)!=null?a:null}}},v={class:"card-body"},D={class:"row mb-3"},V={class:"form-group col-md-6"},b={class:"form-group col-md-6"},y={class:"row mb-3"},p={class:"form-group col-md-6"},k={class:"form-group col-md-6"},w={class:"row"},x={class:"form-group col-md-6"},U={key:0,class:"form-group col-md-6"},h={class:"row"},P={class:"form-group col-md-12"},j={key:0,class:"row"},B={class:"form-group col-md-12"};function C(l,a,e,E,N,n){const m=i("v-select"),t=i("v-text-field"),_=i("v-textarea");return c(),d("div",v,[r("div",D,[r("div",V,[s(m,{"error-messages":e.formData.errors.product_id,color:"primary",label:"Producto",modelValue:e.formData.product_id,"onUpdate:modelValue":a[0]||(a[0]=o=>e.formData.product_id=o),items:e.products,"item-title":"name","item-value":"id"},null,8,["error-messages","modelValue","items"])]),r("div",b,[s(m,{"error-messages":e.formData.errors.package_id,color:"primary",label:"Plan Adquirido",modelValue:e.formData.package_id,"onUpdate:modelValue":a[1]||(a[1]=o=>e.formData.package_id=o),items:n.productPackages,"item-title":"name","item-value":"id"},null,8,["error-messages","modelValue","items"])])]),r("div",y,[r("div",p,[s(t,{"error-messages":e.formData.errors.email,modelValue:e.formData.email,"onUpdate:modelValue":a[2]||(a[2]=o=>e.formData.email=o),color:"primary",label:"E-mail",placeholder:"example@mail.com"},null,8,["error-messages","modelValue"])]),r("div",k,[s(t,{"error-messages":e.formData.errors.password,modelValue:e.formData.password,"onUpdate:modelValue":a[3]||(a[3]=o=>e.formData.password=o),color:"primary",label:"Contrase\xF1a",placeholder:"******"},null,8,["error-messages","modelValue"])])]),r("div",w,[r("div",x,[s(t,{"error-messages":e.formData.errors.subscription_date,modelValue:e.formData.subscription_date,"onUpdate:modelValue":a[4]||(a[4]=o=>e.formData.subscription_date=o),color:"primary",label:"Fecha de subscripci\xF3n",placeholder:"dd/mm/yyyy"},null,8,["error-messages","modelValue"])]),e.formData.accounts_available?(c(),d("div",U,[s(t,{"error-messages":e.formData.errors.accounts_available,modelValue:e.formData.accounts_available,"onUpdate:modelValue":a[5]||(a[5]=o=>e.formData.accounts_available=o),color:"primary",label:"Perfiles habilitados",type:"number"},null,8,["error-messages","modelValue"])])):u("",!0)]),r("div",h,[r("div",P,[s(_,{"error-messages":e.formData.errors.description,color:"primary",label:"Descipci\xF3n",placeholder:"Deje una descripci\xF3n u observaci\xF3n",modelValue:e.formData.description,"onUpdate:modelValue":a[6]||(a[6]=o=>e.formData.description=o)},null,8,["error-messages","modelValue"])])]),e.statuses?(c(),d("div",j,[r("div",B,[s(m,{"error-messages":e.formData.errors.status_id,color:"primary",label:"Estado",modelValue:e.formData.status_id,"onUpdate:modelValue":a[7]||(a[7]=o=>e.formData.status_id=o),items:e.statuses,"item-title":"name","item-value":"id"},null,8,["error-messages","modelValue","items"])])])):u("",!0)])}const F=f(g,[["render",C]]);export{F as default};