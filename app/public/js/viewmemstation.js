var memberStation = new Vue({
  el: '#memberStation',
  data: {
    stationInfo: [],
    activeMember: null
  },
  computed: {
    activeMemberID() {
      return this.activeMember ? this.activeMember.memberID : ''
    },
    activeMemberFirstName() {
      return this.activeMember ? this.activeMember.fname : ''
    },
    activeMemberMiddleName() {
      return this.activeMember ? this.activeMember.mname : ''
    },
    activeMemberLastName() {
      return this.activeMember ? this.activeMember.lname : ''
    },
    activeMemberStreet() {
      return this.activeMember ? this.activeMember.street : ''
    },
    activeMemberCity() {
      return this.activeMember ? this.activeMember.city : ''
    },
    activeMemberState() {
      return this.activeMember ? this.activeMember.state : ''
    },
    activeMemberZipcode() {
      return this.activeMember ? this.activeMember.zip : ''
    },
    activeMemberPhone() {
      return this.activeMember ? this.activeMember.phone : ''
    },
    activeMemberEmail() {
      return this.activeMember ? this.activeMember.email : ''
    },
    activeMemberPosition() {
      return this.activeMember ? this.activeMember.position : ''
    },
    activeMemberStationID() {
      return this.activeMember ? this.activeMember.stationID : ''
    },
    activeMemberRadioNum() {
      return this.activeMember ? this.activeMember.radio_num : ''
    },
    activeMemberStatus() {
      return this.activeMember ? this.activeMember.status : ''
    }
  },
  methods: {
    fetchMemberByStation() {
      fetch('api/records/viewmemstation.php')
      .then(response => response.json())
      .then(json => { memberStation.stationInfo = json })
    }
  },
  created() {
    this.fetchMemberByStation();
  }
});
