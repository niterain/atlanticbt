#! /bin/bash

for i in `ls Entity`; do 
    entity_name=`echo $i | sed -e 's/\.php//'`;
    echo "Creating repository for [$entity_name]";
    cat Entity/$i | sed -e 's/@ORM\\Entity/@ORM\\Entity\n \* @ORM\\Entity(repositoryClass="Application\\Repository\\'$entity_name'Repository")/' > tmp;
    mv tmp Entity/$i;
done
