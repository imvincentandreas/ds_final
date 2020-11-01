var certificateInfo = new Vue({
  el: '#certificateInfo',
  data: {
    certificateInfo: [],
    updatedCertification: {},
    activeCertificate: null
  },
  computed: {
    activeCertificationID() {
      return this.activeCertificate ? this.activeCertificate.certificationID : ''
    },
    activeCertificationName() {
      return this.activeCertificate ? this.activeCertificate.name : ''
    },
    activeCertificationValidity() {
      return this.activeCertificate ? this.activeCertificate.validity : ''
    }
  },
  methods: {
  updateCertificateData(){
    return{
      certificationID: "",
      name: "",
      validity: ""
    }
  },
  viewCertificateDetails() {
    fetch('api/certificates/viewcertificates.php')
    .then(response => response.json())
    .then(json => { certificateInfo.certificateInfo = json })
  },
  editCertificateData(){
    fetch("api/certificates/updatecertificates.php",{
      method:'POST',
      body: JSON.stringify(this.updatedCertification),
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }})
      .then( response => response.text() )
      .then( json => {
        console.log("Returned from comment create:", json);
        this.certificateInfo = json;
        this.updatedCertification = this.updateCertificateData();
      });
    }
},
created() {
  this.viewCertificateDetails();
}
});

function success() {
alert("Certificate Details modified successfully, redirecting to view certificates page");
window.location.href = "viewcertificates.html";
}
