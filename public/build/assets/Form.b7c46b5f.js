import{_ as d,f as n,b as a,a as l,r as s,o as u}from"./app.993b55c8.js";const i={props:{roles:Object,formData:Object}},f={class:"card-body"},c={class:"row mb-3"},_={class:"form-group col-md-3"},V={class:"form-group col-md-9"},D={class:"row mb-3"},g={class:"form-group col-md-4"},b={class:"form-group col-md-4"},v={class:"form-group col-md-4"},y={class:"row"},U={class:"form-group col-md-4"},w={class:"form-group col-md-8"};function x(h,o,e,p,C,N){const m=s("v-text-field"),t=s("v-select");return u(),n("div",f,[a("div",c,[a("div",_,[l(m,{"error-messages":e.formData.errors.document_number,modelValue:e.formData.document_number,"onUpdate:modelValue":o[0]||(o[0]=r=>e.formData.document_number=r),color:"primary",label:"Nro. de Documento"},null,8,["error-messages","modelValue"])]),a("div",V,[l(m,{"error-messages":e.formData.errors.fullname,modelValue:e.formData.fullname,"onUpdate:modelValue":o[1]||(o[1]=r=>e.formData.fullname=r),color:"primary",label:"Nombre Completo"},null,8,["error-messages","modelValue"])])]),a("div",D,[a("div",g,[l(m,{"error-messages":e.formData.errors.username,modelValue:e.formData.username,"onUpdate:modelValue":o[2]||(o[2]=r=>e.formData.username=r),color:"primary",label:"Usuario"},null,8,["error-messages","modelValue"])]),a("div",b,[l(m,{"error-messages":e.formData.errors.email,modelValue:e.formData.email,"onUpdate:modelValue":o[3]||(o[3]=r=>e.formData.email=r),type:"email",color:"primary",label:"E-mail",placeholder:"johndoe@gmail.com"},null,8,["error-messages","modelValue"])]),a("div",v,[l(m,{"error-messages":e.formData.errors.phone,modelValue:e.formData.phone,"onUpdate:modelValue":o[4]||(o[4]=r=>e.formData.phone=r),color:"primary",type:"phone",label:"Celular"},null,8,["error-messages","modelValue"])])]),a("div",y,[a("div",U,[l(m,{"error-messages":e.formData.errors.password,modelValue:e.formData.password,"onUpdate:modelValue":o[5]||(o[5]=r=>e.formData.password=r),color:"primary",type:"password",label:"Contrase\xF1a"},null,8,["error-messages","modelValue"])]),a("div",w,[l(t,{"error-messages":e.formData.errors.rol_id,color:"primary",label:"Rol",modelValue:e.formData.rol_id,"onUpdate:modelValue":o[6]||(o[6]=r=>e.formData.rol_id=r),items:e.roles,"item-title":"display_name","item-value":"id"},null,8,["error-messages","modelValue","items"])])])])}const B=d(i,[["render",x]]);export{B as default};