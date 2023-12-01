console.log("XD");

const LINKS_GROUPS = [
  //
  [{ name: "Home", url: "/src/index.php" }],
  //
  [
    {
      name: "ajouter enseignant",
      url: "/src/enseignant/ajouter_enseignant.php",
    },
  ],
  [
    { name: "etudiants", url: "/src/etudiant/liste_etudiants.php" },
    { name: "ajouter etudiant", url: "/src/etudiant/ajouter_etudiant.php" },
  ],
  //
  [
    { name: "soutenance", url: "/src/soutenance/rechercher.php" },
    {
      name: "ajouter soutenance",
      url: "/src/soutenance/ajouter_soutenance.php",
    },
  ],
];

window.onload = function () {
  const navbar = document.createElement("nav");

  const links_container = document.createElement("div");

  links_container.className = "links-container";

  for (let i = 0; i < LINKS_GROUPS.length; i++) {
    const links_group = LINKS_GROUPS[i];

    const group_container = document.createElement("ul");

    for (let j = 0; j < links_group.length; j++) {
      const link = links_group[j];

      const link_container = document.createElement("li");

      const link_element = document.createElement("a");
      link_element.href = link.url;
      link_element.textContent = link.name;

      link_container.appendChild(link_element);

      group_container.appendChild(link_container);
    }

    links_container.appendChild(group_container);

    navbar.appendChild(links_container);
  }

  document.body.insertBefore(navbar, document.body.firstChild);
};
