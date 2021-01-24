<template>
  <v-app>
      <v-navigation-drawer app></v-navigation-drawer>
      <v-app-bar
        app
        color="indigo"
        dark
      >
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"/>
        <v-toolbar-title>Application</v-toolbar-title>
      </v-app-bar>
      <v-content>
          <v-container fluid>
              <router-link tag="li" to="/">Home</router-link>
              <router-link tag="li" to="/login">Login</router-link>
              <!-- The most important thing here -->
              <router-view></router-view>
          </v-container>
      </v-content>
  </v-app>
</template>

<script>
export default {}
</script>

<style>

</style>
