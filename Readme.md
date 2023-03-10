# DKP Multienv application example

## Requirements
* Project namespace *MUST* named: multienv
* Nodes must be labeled with: environment = <prod/dev/stage/whatever>
* custom application catalog must be attached
* "Envars-webhook" app must be deployed to workspace

### Relabel nodes
````
for i in $(kubectl get no --no-headers |grep -v control|cut -d" " -f1); do kubectl label node $i environment=prod; done
````

## How to deploy the application catalog

1. Define base variables
```
export KUBECONFIG=<path/to/kubeconfig>
export GITSERVER=github.com
export GITREPO=kisahm/dkp-multienv-application
export BRANCH=main
```

2. Define workspace which should contains the catalog
```
export WORKSPACE_NAMESPACE=<workspace namespace>
```

4. Create catalog manifest
````
cat > catalog.yaml <<EOF
apiVersion: source.toolkit.fluxcd.io/v1beta1
kind: GitRepository
metadata:
  name: dkp-multienv-applications
  namespace: ${WORKSPACE_NAMESPACE}
  labels:
    kommander.d2iq.io/gitapps-gitrepository-type: catalog
    kommander.d2iq.io/gitrepository-type: catalog
spec:
  interval: 1m0s
  ref:
    branch: ${BRANCH}
  timeout: 20s
  url: https://${GITSERVER}/${GITREPO}
EOF
````

5. Apply catalog
```
kubectl apply -f catalog.yaml
```

6. Verify GitRepository
````
kubectl get GitRepository -n ${WORKSPACE_NAMESPACE}
````

7. Verify application catalog via cli
````
kubectl get apps -n ${WORKSPACE_NAMESPACE}
````

## Deploy Multi cluster application
1. Create project
> Name: multienv
> Namespace name: multienv
> Namespace Labels: envars=enabled

2. Add GitOps
> Name: multienv
> Repository URL: https://github.com/kisahm/dkp-multienv-application
> Branch name: main
> Path: ./project