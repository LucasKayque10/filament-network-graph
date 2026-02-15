git tag -d v3.0.0
git push origin :refs/tags/v3.0.0
git add .
git commit -am "Deploy V3"
git push
git tag v3.0.0
git push origin v3.0.0