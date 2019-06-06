<template src="./roles-component.html"></template>

<script>
export default {
  mounted() {
    this.getModules();
    this.all();
  },
  data() {
    return {
      data: [],
      item: {
        name: "",
        modules: []
      },
      modules: [],
      subModule: [],
      choose: false,

      titles: [
        {
          prop: "sort",
          label: "Sorting",
          width: "100"
        },
        {
          prop: "name",
          label: "Name Module"
        }
      ],
      paginationDef: {
        pageSize: 10,
        pageSizes: [10, 25, 50, 100],
        currentPage: 1
      }
    };
  },
  methods: {
    all() {
      axios.get("/api/rule").then(response => {
        this.data = response.data;
      });
    },
    created() {
      axios.post("/api/rule", this.item).then(response => {
        this.all()
      })
    },
    updated() {},
    deleted() {},

    getModules() {
      axios.get("/api/module/json").then(response => {
        for (var i = 0; i < response.data.length; i++) {
          this.modules[i] = {
            id: response.data[i].id,
            name: response.data[i].name
          }
          this.subModule[response.data[i].name] = false;
        }
      });
    },

    setModules() {
      console.log(this.item);
      // if (this.item.modules) {
      //   var mod = this.item.modules.split(",");
      //   var index = mod.indexOf(id.toString());
      //   if (index < 0) {
      //     if (mod[1] == "") {
      //       mod[1] = id;
      //       mod.sort();
      //       this.item.modules = mod.toString();
      //     } else {
      //       this.item.modules = this.item.modules + "," + id;
      //     }
      //     this.subModule[name] = true;
      //   } else {
      //     mod.splice(index, 1);
      //     this.item.modules = mod.toString();
      //     this.subModule[name] = false;
      //   }
      // } else {
      //   this.item.modules = id + ",";
      //   this.subModule[name] = true;
      // }
      // console.log(this.item.modules);
    },

    onClickRowTable() {}
  }
};
</script>
